## Sprint 1 Design Document Template

# Deployment Environment

# Setting Up Environment Tutorial:

Create a Zephyr virtual environment. (Some of the downloads you will need may not work on your local machine without an environment due to other downloads you may already have & user preferences set).

#Install Virtualenv\
 `python3 -m pip install virtualenv`

#Create environment called zephyr  
 `python -m virtualenv zephyr`

#Activate and enter VM  
 `source zephyr/bin/activate`

#You will need homebrew; get it here:\
[brew](https://brew.sh)

#install these tools with brew\
`brew install cmake ninja gperf ccache dfu-util qemu dtc python3`  

#You will need West, a Zephyr tool\
 `pip3 install west`  

#Check your version and make sure it’s 0.5.0 or better\
 `west --version`

#Next, clone the Zephyr source code repositories from GitHub using the west tool you just installed.  
 `west init zephyrproject`  
 `cd zephyrproject`  
 `west update`  

#Next, install additional Python packages required by Zephyr:  
 `pip3 install -r zephyr/scripts/requirements.txt`

#This part is a bit tricky and can be done different ways by downloading different toolchains. Here is what I got working for setting the ZEPHYR_TOOLCHAIN_VARIANT.

#Download the following toolchain by clicking ‘Downloads’:
[gnu-toolchain](https://developer.arm.com/tools-and-software/open-source-software/developer-tools/gnu-toolchain/gnu-rm)

#Scroll down to “GNU Arm Embedded Toolchain: 7-2017-q4-major” and select. (This download has no known issues, whereas 2018 is still a bit buggy).

#Scroll back up and download the Mac OS X 64-bit (This may take a minute)

#Move the toolchain to home/opt (That is where Zephyr looks for toolchains by default):\
`mkdir -p "${HOME}"/opt`\
`cd "${HOME}"/opt`\
`tar xjf ~/Downloads/gcc-arm-none-eabi-7-2017-q4-major-mac.tar.bz2`\
`chmod -R -w "${HOME}"/opt/gcc-arm-none-eabi-7-2017-q4-major`

#Now back to the zephyr environment. Navigate to the main project directory:
`cd zephyrproject/zephyr`

#Set up your build environment:\
`source zephyr-env.sh`

#Build the application:\
`cd $ZEPHYR_BASE/samples/hello_world`\
`mkdir build && cd build`

#Set toolchain variable\
`export GNUARMEMB_TOOLCHAIN_PATH='~/opt/gcc-arm-none-eabi-7-2017-q4-major/'`

#Set Zephyr Variant\
`export ZEPHYR_TOOLCHAIN_VARIANT=gnuarmemb`

#CMake a board of your choosing…I use the qemu_cortex_m3 emulator here (The board MUST be compatible with the toolchain we just downloaded…or else you will get an error when running this command):\
`cmake -GNinja -DBOARD=qemu_cortex_m3 ..`

#Finally, run the ninja command\
`ninja run`

#Result:

![hello](https://github.com/segFaultCity/ZephyrGroup3/blob/master/hello.png)

## Functional Requirements

- Create a Functional User Interface that that will house 3 naviagtion buttons (The buttons: "Set Random Reminders", "Set Daily Schedules", "Set Infant Routines") . Each button will link to one of three modes we provide for the user. This will be the landing page and the appearance should be aestetically pleasing.

1. Random Reminders
	- When this button is pressed, there should be a new interface which will present the following buttons:
		- Make a Random Reminder:
			- A modal form should pop up after this option is selected.
			- There should be three input text boxes, one for the reminder title, another for a location, and the last for time.
			- A submit button should be created.
			- When the submit button is pressed, the reminder information should be written to a C file or as JSON.
			- The backend at this point should connect to the Google Maps API and calculate the time needed to arrive at the destination based of the location entered. This calculated time will subtact from the time input by the user.
			- User preferences, if set, will subtract from the resulting time made by the previous calculation.
			- The alarm will now finally be set. The final calculated time should be written to a C file and in local storgae on the browser.
		- Set Random Preferences:
			- A modal form should pop up after this option is selected.
			- The user should be presented with the following questions:
				- How long does it take you to get ready? (Provide input box restricted to integers)
				- Do you need more time to wake up? (Slow wake up option) (Provide yes/no)
			- These times will be used for calculating the alarm time.
			
2. Daily Schedule		
	- When this button is pressed, there should be a new interface which will present the following buttons:
		- Set a Daily Schedule:
			- A modal form should pop up after this option is selected.
			- The user will have two options: Either set the daily schedule manually or pull from the Google Calender API using there Google account. Using the Google Calendar API, the backend should connect to the users account via there credentials and pull there daily calender data. This will automatically populate the form fields below to the best of its ability. If the user does not select this option, they can fill out the following form:
			- The following fields should be added to the form:
				- Title of the daily schedule.
				- What time it occurs everyday.
				- Create a dropdown menu that allows the user to choose the type of daily schedule. (Work, recreational, workout, meeting, etc.)
				- The location of the daily schedule.
			- There should be a submit button located at the end of the form.
			- When the submit button is pressed, the reminder information should be written to a C file or as JSON.
			- The backend at this point should connect to the Google Maps API and calculate the time needed to arrive at the destination based of the location entered. This calculated time will subtact from the time input by the user.
			- User preferences, if set, will subtract from the resulting time made by the previous calculation.
			- The alarm will now finally be set recursively everyday. The final calculated time should be written to a C file and in local storgae on the browser.
		- Set Daily Preferences:
			- A modal form should pop up after this option is selected.
			- The user should be presented with the following questions:
				- How long does it take you to get ready? (Provide input box restricted to integers)
				- Do you need more time to wake up? (Slow wake up option) (Provide yes/no)
			- These times will be used for calculating the alarm time.	

3. Infant Routines
	- When this button is pressed, there should be a new interface which will present the following buttons:
		- Set an Infant Routine:
			- A modal form should pop up after this option is selected.
			- The user should be presented the following questions:
				- What type of Routine is this (Nap Time, Feeding, Medicine, Other) (Presented as dropdown)
				- What time should this routine be set for? (Provide input box restricted to integers)
				- Add Notes. (Provide a text field that will allow them to create notes or additonal reminders upon being alarmed).
			- The routine time will be set earlier if user preferences are set for preparation time needed. 	
		- Set Routine Preferences:
			- A modal form should pop up after this option is selected.
			- The user should be presented with the following questions:
				- How long do you need to prepare for the infants routine?
				- If a nap time is set, what song would you like to play? (Provide an upload for a song or and a list of built in grooooooovy tunes)
				- The above song will play if set when a routine type is "Nap Time"
				

## Database Design

### ERD

![ERD](https://github.com/segFaultCity/ZephyrGroup3/blob/master/ERDzephyr.png)

## Files that are stubbed out in your repository, with comments about the use cases they are connected to. These sections may not all exist for the Zephyr project teams. Simply explain them as best you can. 

### User Interface Files

1. User Interface flow to Zephyr (Used by all Use Cases)
 
![UserInterfaceFunctionalStub](https://github.com/segFaultCity/ZephyrGroup3/blob/master/UserInterfaceStubbed.png)

### Model & Other Files (Database/Local Storage Access & More)

1. 


### Controller Files (API or other)

1. Google Maps API function: (Used by Daily Schedule and Random Reminders use cases)
	- Pseudo Code (Would be called using javascript)
	- Prerequisite: Google API key.
	
	```
	function initMap() {
		//Google API function  
		var map = initialized coordinates //initializes starting position of map before location service starts
	} 
	
	function initDirections() {  
		var A = (current location grabbed by location finder)  
		var directionsService = new google.maps.DirectionsService; //google maps built in direction service  
		var B = (user input location for reminder)  
		directionsRenderer(A,B) 
	}	
		
	grabDistance {  
		//API grabs home distance and time away from home to work/reminder destination.  
		var time = directionsRenderer time returned  
		return time  
	}  
	```
	
2. Google Calender API function: (Used by Daily Schedule and Random Reminders use cases)
	- Pseduo Code (Would be called using javascript)
	- Prerequisite: Google API key.
	
	```
	function calenderPull() {
		//google API retrieves user data from calender using their credentials sent through the API
		var userData = //object the API returns
		return userData
	}
	```
	
	

## Describe languages you need to use, and any gaps in skills on your team. 

1. General Strengths and Weaknesses:
	- Ben Blanquart
		- Strengths: Strong python background, strong C background, strong database background, web development experience, some experience with microcontrollers. PHP experience.
		- Weaknesses: No Zephyr OS experience, limited virtual machine background.
 	- Christian Caldwell
		- Strengths: Strong web development background, strong C background, strong database background, AWS server experience, PHP experience, Google Maps API experience.
		- Weaknesses: No python experience, no Zephyr experience, no microcontroller experience, limited virtual machine background.
	- Michael Rubenstein
		- Strengths: Strong C experience, strong database experience, strong virtual machine experience. 
		- Weaknesses: No python experience, no Zephyr experience, no microcontroller experience.

2. Languages we will need and who will be most effective working with it:
	- Python (For backend): Ben Blanquart.
	- HTML/CSS/Javascript (For user interface, form creation, and C File writing): Christian Caldwell & Ben Blanquart.
	- C (For backend and zephyr running): Michael Rubenstein, Christian Caldwell, and Ben Blanquart.
	- PHP (Maybe): Christian Caldwell & Ben Blanquart.
	
3. Data handling and possible Database use:
	- Local Storage: The data a user inputs through the html form can be saved locally by a browsers local storgae. With local storage, we can save and reuse user data without the use of a database. (Christian Caldwell has experience using local storgae)
	- If not by local storgae: A database can be created by all three members of group 3. By SQL, we can dynamically populate a database with user daved data and reuse that for future use. PHP may be needed for this; in this case, both Christian Caldwell and Ben Blanquart have PHP experience and can use this to send/pull data from the database.
	
4. Team skill gaps:
	- Our team lacks the general knowledge of running and constructing Zephyr projects.
	- Our team will make up for this skill gap by practicing and running sample projects already made by Zephyr. Through these trials, we will see how builds are made and attempt to create our own architecture.
