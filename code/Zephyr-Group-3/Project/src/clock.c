/*
 * Copyright (c) 2017 Linaro Limited
 *
 * SPDX-License-Identifier: Apache-2.0
 */

//#define CONFIG_NET_SOCKETS_SOCKOPT_TLS true
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <json-c/json.h>
#include <ctype.h>
#include <time.h>
#include <unistd.h>
#ifndef __ZEPHYR__

#include <netinet/in.h>
#include <sys/socket.h>
#include <arpa/inet.h>
#include <unistd.h>
#include <netdb.h>

#else

#include <net/socket.h>
#include <kernel.h>

#if defined(CONFIG_NET_SOCKETS_SOCKOPT_TLS)
#include <net/tls_credentials.h>
#include "ca_certificate.h"
#endif

#endif

/* HTTP server to connect to */
//#define HTTP_HOST "ec2-34-201-220-43.compute-1.amazonaws.com"
/* Port to connect to, as string */
#if defined(CONFIG_NET_SOCKETS_SOCKOPT_TLS)
#define HTTP_PORT "443"
#else
#define HTTP_PORT "80"
#endif
/* HTTP path to request */
//#define HTTP_PATH ""


#define SSTRLEN(s) (sizeof(s) - 1)
#define CHECK(r) { if (r == -1) { printf("Error: " #r "\n"); exit(1); } }

//#define REQUEST "GET " HTTP_PATH " HTTP/1.0\r\nHost: " HTTP_HOST "\r\n\r\n"

static char response[1024];

void dump_addrinfo(const struct addrinfo *ai)
{
	printf("addrinfo @%p: ai_family=%d, ai_socktype=%d, ai_protocol=%d, "
	       "sa_family=%d, sin_port=%x\n",
	       ai, ai->ai_family, ai->ai_socktype, ai->ai_protocol,
	       ai->ai_addr->sa_family,
	       ((struct sockaddr_in *)ai->ai_addr)->sin_port);
}

void my_alarm(void){
	int i;
	for(i = 0; i < 11; i++){
		sleep(1);
		printf("ALARM!!!\a\n");
	}
	return;
}
int first_two_digits(int n) 
{ 
    // Remove last digit from number 
    // till only one digit is left 
    while (n >= 100)  
        n /= 100; 
      
    // return the first digit 
    return n; 
} 

int main(void)
{
	static struct addrinfo hints;
	struct addrinfo *res;
	int st, sock;

#if defined(CONFIG_NET_SOCKETS_SOCKOPT_TLS)
	tls_credential_add(CA_CERTIFICATE_TAG, TLS_CREDENTIAL_CA_CERTIFICATE,
			   ca_certificate, sizeof(ca_certificate));
#endif

	char host[64] = "ec2-34-201-220-43.compute-1.amazonaws.com";
	char username[64];
	char my_path[1024] = "/remindOclock/webService.php?username=";
	char my_path2[1024] = "&reminder=";
	char routine[32];
	//char routine2[32]
	char input;

	ask_for_input:
	printf("Please enter what routine, you would like to access('1': for infant routine, '2' for daily reminders and '3' for random reminders)\n");
	scanf("%c", &input);
	if(input == '1'){
		char routine2[] = "infantRoutine";
		strcpy(routine, routine2);
	}
	else if(input == '2'){
		char routine2[] = "dailyReminder";
		strcpy(routine, routine2);
	}
	else if(input == '3'){
		char routine2[] = "randomReminder";
		strcpy(routine, routine2);	
	}
	else{
		printf("Invalid input\n");
		goto ask_for_input;
	}

	printf("Please Enter a username for %s: ", routine);
	scanf("%s", username);

	strcat(my_path, username);
	strcat(my_path, my_path2);
	strcat(my_path, routine);


	//printf("Preparing HTTP GET request for http://%s"
	//       ":" HTTP_PORT "%s \n", host, my_path);

	hints.ai_family = AF_INET;
	hints.ai_socktype = SOCK_STREAM;
	st = getaddrinfo(host, HTTP_PORT, &hints, &res);
	//printf("getaddrinfo status: %d\n", st);

	if (st != 0) {
		printf("Unable to resolve address, quitting\n");
		return 1;
	}

#if 0
	for (; res; res = res->ai_next) {
		dump_addrinfo(res);
	}
#endif

	//dump_addrinfo(res);

#if defined(CONFIG_NET_SOCKETS_SOCKOPT_TLS)
	sock = socket(res->ai_family, res->ai_socktype, IPPROTO_TLS_1_2);
#else
	sock = socket(res->ai_family, res->ai_socktype, res->ai_protocol);
#endif
	CHECK(sock);
	//printf("sock = %d\n", sock);

#if defined(CONFIG_NET_SOCKETS_SOCKOPT_TLS)
	sec_tag_t sec_tag_opt[] = {
		CA_CERTIFICATE_TAG,
	};
	CHECK(setsockopt(sock, SOL_TLS, TLS_SEC_TAG_LIST,
			 sec_tag_opt, sizeof(sec_tag_opt)));

	CHECK(setsockopt(sock, SOL_TLS, TLS_HOSTNAME,
			 host, sizeof(host)))
#endif

	char request[1024] = "GET ";
	strcat(request, my_path);
	strcat(request, " HTTP/1.0\r\nHost: ");
	strcat(request, host);
	strcat(request, "\r\n\r\n");		

	//printf("REQUEST:%s\n", request);

	CHECK(connect(sock, res->ai_addr, res->ai_addrlen));
	CHECK(send(sock, request, SSTRLEN(request), 0));

	struct json_object *parsed_json;
	struct json_object *my_time;
	struct json_object *my_username;


	char *ptr = response;
	int len;
	while(1) {
		len = recv(sock, response, sizeof(response) - 1, 0);

		if (len < 0) {
			printf("Error reading response\n");
			return 1;
		}

		if (len == 0) {
			break;
		}

		response[len] = 0;
		
		//printf("%s\n", response);
		for(int i = 0; i < len; i++){
			if(*ptr == '{'){
				break;
			}
			ptr++;

		}
	}

	
	parsed_json = json_tokener_parse(ptr);
	json_object_object_get_ex(parsed_json, "time", &my_time);
	
	printf("Setting alarm for: %s\n", json_object_get_string(my_time));
	
	char time_string[12];
	strcpy(time_string, json_object_get_string(my_time));
	char* time_string_ptr = time_string;
	char hour[2];
	int my_minute;
	int my_hour;

	int i;
	for(i = 0; i < SSTRLEN(time_string); i++){
		if(*time_string_ptr == ':'){
			time_string_ptr++;
			break;
		}
		time_string_ptr++;
		
	}
	if(i > 1){
			strncpy(hour, time_string, 2); 
	}
	else{
		strncpy(hour, time_string, 1);
	}

	my_hour = atoi(hour);
	//printf("Hour%d\n", my_hour);
	char minute[2];
	strncpy(minute, time_string_ptr, 2);
	my_minute = atoi(minute);
	//printf("Alarm time: Hour: %d Minute: %d\n\n", my_hour, my_minute);
	my_minute = first_two_digits(my_minute);
	//printf("Alarm time: Hour: %d Minute: %d\n\n", my_hour, my_minute);
	time_string_ptr += 2;
	
	if(time_string_ptr[0] == 'P' && time_string_ptr[1] == 'M'){
		my_hour += 12;
	}
	
	time_t currentTime;
	

	
	struct tm *my_time2;
	while(1){
		time(&currentTime);
		my_time2 = localtime(&currentTime);
		
		//printf("Current Time: Hour: %d Minute: %d\n", my_time2->tm_hour, my_time2->tm_min);
		//printf("Alarm time: Hour: %d Minute: %d\n\n", my_hour, my_minute);
		if(my_time2->tm_min == (my_minute) && my_time2->tm_hour == (my_hour)){
			my_alarm();
			break;
		}
		sleep(1);
	}

	(void)close(sock);

	return 0;
	
}


