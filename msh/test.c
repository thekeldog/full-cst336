#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <stdbool.h>

#define MAXSTR 120

int main(){
  char input[MAXSTR+3];
  
  fgets(input, MAXSTR+3, stdin);

  char s[256];
  strcpy(s,input);
  char* token = strtok(s, " ");
  while (token) {
    printf("token: %s\n", token);
    token = strtok(NULL, " ");
  }

  return 0;
}
