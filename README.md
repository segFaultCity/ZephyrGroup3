# ZephyrGroup3
Zephyr project done by Group 3 of 4320.

Home automation system the provides random reminders, alarms for schedules, and infant routine reminders. The system will benefit all parts of a household and provide an all in one reminder system available all throughout the stakeholders establishment.



## Sprint 2 Installation and Configuration

Install Virtual Box if you have not already done so  

Download the virtual appliace from here:     
[Download our Build](https://www.mediafire.com/file/l31su68apvbzyzl/ZephyrOS2.ova/file)  

Import the virtual appliance by clicking file (In your VirtualBox desktop app) ->  import appliance and navigate and select the .ova file you donloaded in the previos step  

Boot Up the newly created virtual macine and login to the "User" account and use password "pass"  

Navigate to Documents/zephyr in the terminal  

Run the command  
`source zephyr/bin/activate`

Now navigate to our project folder in the terminal inside the zephyr venv    
`cd zephyrproject/zephyr/Zephyr-Group-3/Project`  

Next compile the project  
`make -f Makefile.posix`  

To run the project run the command  
`./clock`

# Proof our system works:

Routine Creation:
![Routine Creation](https://github.com/segFaultCity/ZephyrGroup3/blob/master/images/routineCreation.png)  

Routine is inserted into our database:
![Data Insertion](https://github.com/segFaultCity/ZephyrGroup3/blob/master/images/insertionIntoDatabase.png)

Emulating the app GET request by our webservice:
![GET by Web](https://github.com/segFaultCity/ZephyrGroup3/blob/master/images/GETRequestByWeb.png)

Running the zephyr app and getting the same result:
![Zephyr GET](https://github.com/segFaultCity/ZephyrGroup3/blob/master/images/zephyrAppRunning.jpg)

# Checkout the sprint2 doc:
[Sprint2](https://github.com/segFaultCity/ZephyrGroup3/blob/master/markdownFiles/SystemNeeds.md)
