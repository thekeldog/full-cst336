#include <stdio.h>

#include <stdlib.h>

#include <string.h>

#include <time.h>

#include <errno.h>

#include <unistd.h>

#include <stdbool.h>



/*
 * msh.c -Simple Shell
 *
 * Shell Program borrowed mostly from Dr. Bruns' post on Slack.
 * Version 1.1 - Added features to change directory, and print working directory
 * Additional feature added is taking an argument with program call to read
 * from a file provided by user. 
 *
 * @Author: Kellen Rice
 * CST-334 - Operating Systems

 */


// For input string, command line and file input
#define MAX_BUF 160

// For when input is tokenized
#define MAX_TOKS 100

/* called when cd is entered. path includes path[0]="cd" */
void changeDir(char *path[MAX_TOKS]){
  int i = 0;
  //printf("change dir function\n");
   
  int successOrFail = 1;
  char pathString[MAX_BUF];
   char curr[MAX_BUF];
   if (path[1] != NULL){
     strncpy ( pathString, path[1], MAX_BUF);
    //printf("path string: %s", pathString);
    successOrFail = chdir(pathString);
     // -1 means failed
     if(successOrFail != 0) {
       printf("msh: %s: %s: %s\n", path[0], path[1], strerror(errno));
     }
     //printf("Change directory %s", (successOrFail == 0) ? "suceeded": "failed");
   }
   else {
    //printf("no path string\n");
    successOrFail = chdir(getenv("HOME"));
    //printf("Change directory %s", (successOrFail == 0) ? "suceeded": "failed");
     //printf("%s\n", getcwd(curr, MAX_BUF));
   }
}

int main(int argc, char *argv[]) {
  bool fileMode = false;
  
  char *pos;

  char *tok;

  char s[MAX_BUF];
  
  char forPrints[MAX_BUF];

  char *toks[MAX_TOKS];

  time_t rawtime;

  struct tm *timeinfo;

  static const char prompt[] = "msh> ";
  
  char *status;
  
  
  while (1) {
    /* 
    An argument was passed with program call. This will be a text file
    hopefully
  */
    if ( argv[1] != NULL){
      fileMode = true;
      FILE * file;
      file = fopen(argv[1], "r");
      if(file != NULL) {
        status = fgets(s, MAX_BUF-1, file);
        printf("%s", status);
      }else{
        printf("couldn't locate file");
      }
      argv[1] = NULL;
      fclose(file);
    } else{
      /* prompt for input */
  
      printf(prompt);
  
      /* read input */
      status = fgets(s, MAX_BUF-1, stdin);
    }
  
  
      /* exit if ^d or "exit" entered */
  
      if (status == NULL || strcmp(s, "exit\n") == 0) {
  
        if (status == NULL) {
  
  	    printf("\n");
  
        }
  
        exit(EXIT_SUCCESS);
  
      }
  
      /* remove any trailing newline */
  
      if ((pos = strchr(s, '\n')) != NULL) {
  
        *pos = '\0';
  
      }
  
  
  
      /* break input line into tokens */
  
      char *rest = s;
  
      int i = 0;
  
      while ((tok = strtok_r(rest, " ", &rest)) != NULL && i < MAX_TOKS) {
  
        toks[i] = tok;
  
        i++;
  
      }
  
      if (i == MAX_TOKS) {
  
        fprintf(stderr, "main: too many tokens");
  
        exit(EXIT_FAILURE);
  
      }
  
      toks[i] = NULL;
  
  
  
      /* do nothing if no tokens found in input */
  
      if (i == 0) {
  
        continue;
  
      }
      
      /* bash cd command*/
      if (strcmp(toks[0], "cd") == 0) {
        changeDir(toks);
        continue;
      }
  
      /* pwd command 
      if (strcmp(toks[0], "pwd") == 0) {
        printf("%s\n", getcwd(forPrints, MAX_BUF));
      }
      */
  
  
      /* if a shell built-in command, then run it */
  
      if (strcmp(toks[0], "help") == 0) {
  
        printf("enter a Linux command, or 'exit' to quit\n");
  
        continue;
  
      } 
  
      if (strcmp(toks[0], "today") == 0) {
  
        time(&rawtime);
  
        timeinfo = localtime(&rawtime);
  
        printf("%02d/%02d/%4d\n", 1 + timeinfo->tm_mon, timeinfo->tm_mday, 1900 + timeinfo->tm_year);
  
        continue;
  
      }
  
  
  
      /* otherwise fork a process to run the command */
  
      int rc = fork();
  
      if (rc < 0) {
  
        fprintf(stderr, "fork failed\n");
  
        exit(1);
  
      }
  
      if (rc == 0) {
  
        /* child process: run the command indicated by toks[0] */
  
        execvp(toks[0], toks);  
  
        /* if execvp returns than an error occurred */
  
        printf("msh: %s: %s\n", toks[0], strerror(errno));
  
        exit(1);
  
      } else {
  
        // wait for command to finish running
  
        wait(NULL);
  
      }
      if (fileMode == true){
          break;
        } 
  
    }
    
  

}