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

![communication](https://github.com/segFaultCity/ZephyrGroup3/blob/master/images/dataCommunication.png)

# Rundown of how use case 1 was implemented:

Use case implemented from our project: Create Infant Routine Reminders.  
The following are steps on how the system works:

1. The user logs in to our website (Or makes an account if on their first visit. User account information is sent securely using PHP and is saved to our database instance on AWS).
2. Now, on the main page, a user has the option to create Infant Routines (Daily Schedules and Random Reminders coming soon!).
3. After this selection, the user is presented with a form in which they can create any necessary routines. (This data is sent to our database by PHP).
4. Now, the hardware we created and ran by Zephyr pulls this created routine through a GET request to our server. The Retrieved data is then displayed in the Zephyr environment and is made available for alerts.  

Create your own account and infant routine:    
[Remind O' Clock](http://ec2-34-201-220-43.compute-1.amazonaws.com/remindOclock/)  

Emulate GET request here:  
[Remind O' Clock WebService](http://ec2-34-201-220-43.compute-1.amazonaws.com/remindOclock/webService.php?)  

Run GET request and receive alarm times through zephyr on your environment by following these steps on our repositorys README.md:  
[Run Our App on a Zephyr Environment](https://github.com/segFaultCity/ZephyrGroup3/blob/master/README.md)
