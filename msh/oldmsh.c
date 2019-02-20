/*
File currently not executing command line style commands

*/
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <stdbool.h>
#include <time.h>

#define MAXSTR 120

void printTime(){
    time_t rawtime;
    struct tm *info;
    char buffer[80];
    time( &rawtime );
    info = localtime( &rawtime );
    strftime(buffer,80,"%x", info);
    printf("%s\n", buffer );
}

// execvp currently not working properly with myarg array
void submitCommand(char input[MAXSTR+3]){
  //printf("Look at me, I'm submitting a command! pid:%d (parent)\n",(int) getpid());
  char s[256];
  strcpy(s,input);
  char *token = strtok(s, " ");
  // last element is non-word character, so -1 on length
  int numTokens = (int) strlen(token) -1;
  //printf("test tokenprint: %s", &token[0]);

  int rc = fork();
  // fork failed
  if(rc < 0){         
    fprintf(stderr, "fork failed\n");
    exit(1);
  }else if (rc==0) {  //child (new process)
    printf("numTokens:%d\n", numTokens);
    char *myargs[numTokens+2];
    int j=0;
    while (token) {
      //
      myargs[j] = token;
      printf("myarg[%d] = %s\n",j,token);
      j++;
      token = strtok(NULL, " ");
    }
    myargs[j] = NULL;
    int i=0;
    for(i;j<=j;i++){
      printf("i=%d: %s ", i, myargs[i] );
    }
  
  /*  
    char *testArgs[3];
    testArgs[0] = "cat";
    testArgs[1] = "text.txt";
    testArgs[2] = NULL;
  */
    
    if(execvp(myargs[0], myargs)){
      printf("msh: %s: \n", myargs[0]); //strerror(errno)
    }
  } else { // parent ends up down here
    int rc_wait = wait(NULL);
    //printf("hello, I'm the parent");
  }
  return;
}

bool readInput(char input[MAXSTR+3]){
  
  int n = strlen(input)-1;
  int wordStart = 0;
  int wordEnd = 0;
  char aWord[MAXSTR+3];
  char exitString[] = "exit\n";
  
  int i=0;
  

  // Check for exit status
  if(strcmp(input,exitString) == 0){
    return true;
  }else if(strcmp(input,"help\n")==0){
      printf("enter Linux commands, or ‘exit’ to exit\n");
  }else if(strcmp(input,"today\n")==0){
	printTime();
      }

  // If not exit, tokenize
  submitCommand(input);
  
  printf("\n");
  return false;
}

int main() {

  char input[MAXSTR+3];
  char throwAway[MAXSTR+3];

  bool done = false;
  int count = 0;

  while(!done){
    printf("msh> ");

    bool exit = (fgets(input, MAXSTR+3, stdin)==NULL);
    if(exit){
      printf("\n");
      return 0;
    }
    int n = strlen(input)-1;

    if(n > MAXSTR){
      printf("error: input too long\n");
    }
    if(!strchr(input, '\n')){
      while(fgetc(stdin)!='\n');
    }
    //fgets(throwAway, MAXSTR+3, stdin);                                  

    if(n < MAXSTR && readInput(input)){
      done = true;
    }
  }
  return 0;
}
