# SQL Database:
- At first, our group was unsure on whether or not we would incorporate a database. With further discussion, we realized it would be a smooth process to run a user interface via an ec2 linux instance that is linked to an AWS database. This way we can keep track of user information and make simple GET request from our Zephyr app and run the alarm.  
- The Following link displays the tables created for Use Case 1 that we implemented (Infant Routines).  
[Database Scheme](https://github.com/segFaultCity/ZephyrGroup3/blob/master/markdownFiles/databaseScheme.md)

# A look at our dummy data:
![dummy data](https://github.com/segFaultCity/ZephyrGroup3/blob/master/images/dummyData.png)

# Zephyr Code:
[Zephyr Code Here](https://github.com/segFaultCity/ZephyrGroup3/tree/master/code/Zephyr-Group-3/Project)
- IMPORTANT: This code must be in the VM to run. Our group has a download for a working VM that's prebuilt for users. Get the VM and learn how to run the code here:    
[Run our app on VM](https://github.com/segFaultCity/ZephyrGroup3/blob/master/README.md)

# PHP Code (database manipulation and more):  
[PHP Code Here](https://github.com/segFaultCity/ZephyrGroup3/tree/master/code/php)

# CSS Code (Because that user interface needs to be pretty):  
[CSS Code Here](https://github.com/segFaultCity/ZephyrGroup3/tree/master/code/css)

# Files Added to Sprint 2 WiKi:  
[SystemNeeds.md](https://github.com/segFaultCity/ZephyrGroup3/blob/master/markdownFiles/SystemNeeds.md)  
[code.md](https://github.com/segFaultCity/ZephyrGroup3/blob/master/markdownFiles/code.md)  
[Base README.md](https://github.com/segFaultCity/ZephyrGroup3/blob/master/README.md)  

# Unit Test Created:
1. We added fake users by making user accounts. Check out the GET request returned by these dummy users by our webservice emulator:
[Username: ChrisCaldwell55](http://ec2-34-201-220-43.compute-1.amazonaws.com/remindOclock/webService.php?username=ChrisCaldwell55&reminder=infantRoutine)  
[Username: michael](http://ec2-34-201-220-43.compute-1.amazonaws.com/remindOclock/webService.php?username=michael&reminder=infantRoutine)  
[Username: testUser](http://ec2-34-201-220-43.compute-1.amazonaws.com/remindOclock/webService.php?username=testUser&reminder=infantRoutine)  

  - NOTE: The dummy data you can easily view here is the same data that is returned when running through the zephyr build we created and made available in our README.md. This webservice you are viewing is what our Zephyr application grabs to create the alarm. To achieve the same results on the zephyr app we created: Run the app and when prompted, input one of the usernames above. 
  - WARNING: The zephyr build will segfault if you run a user that has not been created.
  - Suggestion: Visit the website and create your own user account. Then create a routine and hit submit once. Now run the zephyr build with your username when prompted.[Website here](http://ec2-34-201-220-43.compute-1.amazonaws.com/remindOclock/) 
  
