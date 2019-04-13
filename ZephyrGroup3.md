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
			- The backend at this point should connect to the Google Maps API and calculate the time needed to arrive at the destination. This calculated time will subtact from the time input by the user.
			- User preferences, if set, will subtract from the resulting time made by the previous calculation.
			- The alarm will now finally be set. The final calculated time should be written to a C file and in local storgae on the browser.
		- Set Preferences:
			- A modal form should pop up after this option is selected.
			- The user should be presented with the following questions:
				- How long does it take you to get ready? (Provide input box restricted to integers)
				- Do you need more time to wake up? (Slow wake up option) (Provide yes/no)
			- These times will be used for calculating the alarm time.
			
2. Daily Schedule		
	- Functional Requirement 1
	- Functional Requirement 2
	- ... etc.
3. ... etc. 

## Database Design

### ERD

**some kind of logical ERD, at least, that lets us know what data is being managed**
![ERD](./images/erd.png)

### DDL 

n/a

## Files that are stubbed out in your repository, with comments about the use cases they are connected to. These sections may not all exist for the Zephyr project teams. Simply explain them as best you can. 

### User Interface Files

1. first one
2. second one
3. etc.


### Model Files (Database Access)

1. first one
2. second one
3. etc


### Controller Files (API or other)

1. first one 
2. second one
3. etc. 

## Describe languages you need to use, and any gaps in skills on your team. 

1. first language 
    - how you will use examples or learn what you need
2. second language 
    - how you will use examples or learn what you need
3. Skill gaps, if any, otherwise specify who is doing what
    - name
    - name
    - skill gap 

