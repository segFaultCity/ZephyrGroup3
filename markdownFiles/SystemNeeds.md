## What is necessary for our system to work:

Overview:  
1. Backend: Zephyr net-tools, Zephyr HTTP request, Zephyr virtual environment, AWS RDS instance (Database hosting), AWS EC2 instance (Website Hosting), C code, and PHP. 
  - Net-tools: Allows zephyr applications to make connections to servers.
  - HTTP Request: Allows zephyr applications to make GET/POST request to servers and retrieve the returned data.
  - Virtual Environment: Needed to run zephyr projects with no issues and allows a smooth process when running apps.
  - AWS RDS instance: Needed to host a MySQL database which can easily connect with an AWS instance. Making data creation and insertion simple.
  - AWS EC2 instance: Allows hosting of html files which offer an aesthetically pleasing interface for users of the system and an easy way for data communication.
  - C code: Main programming language used for running zephyr apps.
  - PHP code: Programming language used to communicate with database and make insertions/selections with it.
2. Frontend: HTML5, JavaScript, and CSS3.  
3. Data Sources: We have revised or data saving plans. Our use cases are now functioning under an Amazon Web Service Relational Database instance. This instance is initialized to MySQL.  

![communication](https://github.com/segFaultCity/ZephyrGroup3/blob/master/dataCommunication.png)
