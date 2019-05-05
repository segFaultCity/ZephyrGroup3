
Before accessing our project from the Zephyr side you must first create an account from our AWS website.
http://ec2-34-201-220-43.compute-1.amazonaws.com/remindOclock/index.php

All of the account settings are handled by our AWS website. We use Zephyr to get that information to our local device. 

Install Virtual Box if you have not already done so  

Download the virtual appliace from here:     
[Download our Build](https://www.mediafire.com/file/l31su68apvbzyzl/ZephyrOS2.ova/file)  

Import the virtual appliance by clicking file (In your VirtualBox desktop app) ->  import appliance and navigate and select the .ova file you donloaded in the previos step. You may need to adjust the CPU core count and ram allocation if your system does not have sufficent resources.   

Boot Up the newly created virtual macine and login to the "User" account and use password "pass"  
  

Run the command  
`source ~/Documents/zephyr/zephyr/bin/activate`

Now navigate to our project folder in the terminal inside the zephyr venv    
`cd ~/Documents/zephyr/zephyrproject/zephyr/Zephyr-Group-3/Project`  

Next compile the project  
`make -f Makefile.posix`  

To run the project run the command  
`./clock`

Enter the username that you used on our AWS website and you will get all of the information for your alarm.