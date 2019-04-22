# ZephyrGroup3
Zephyr project done by Group 3 of 4320.

Home automation system the provides random reminders, alarms for schedules, and infant routine reminders. The system will benefit all parts of a household and provide an all in one reminder system available all throughout the stakeholders establishment.



##Sprint 2 Installation and Configuration

#install Virtual Box if you have not already done so

#Download the virtual appliace from here: 
  `download.com`

#Import the virtual appliance by clicking file ->  import appliance and navigate and select the .ova file you donloaded in the previos step

#Boot Up the newly created virtual macine and login the the "User" account and use password "pass"

#Navigate to Documents/zephyr in the terminal

#Run the command
`source zephyr/bin/activate`

#Now navigate to our project folder in the terminal inside the zephyr venv
`cd zephyrproject/zephyr/Zephyr-Group-3/Project`

#Next compile the project
`make -f Makefile.posix`

#To run the project run the command
`./clock`
