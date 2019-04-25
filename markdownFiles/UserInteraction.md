## Zephyr Group Three
# Remind O’ Clock Application

This Interaction to the system description will take the persona of one particular stakeholder: A parent of a busy/full household.  
  
Persona:  
Name: Marsha Staple  
Job: Full time mechanical engineer  
Age: 28  
  
Enjoys: Spending time with her husband, Charles Staple, and her two kids [Malissa (15 years old), Damien (1 year old)]. Reads whenever she gets the chance and often plays with the family dog.  

Marsha has a busy life and always seems to have a hard time remembering her activities and obligations, and it doesn’t help that her notes on these activities are across several platforms. That is, until she saw an advertisement online about the number one reminder system for Home and Web, “Remind O’ Clock”.
Marsha was super excited about the chance to try something new and so promising! To get started, Marsha visited [RemindO’Clock.com](http://ec2-34-201-220-43.compute-1.amazonaws.com/remindOclock/) and created a user account. After creating an account, Marsha was brought to a portal that allowed her to setup three different reminders in one spot. The three options presented to her were for Daily Reminders (perfect for her everyday busy life), Random Reminders (convenient for appointments, important meetings, and much more), and Infant Routines (Just what Marsha needs for taking care of her one year old, Damien). Upon making a selection, Marsha was then presented with a simple form that prompted minimal questions concerning her needs (Reminder Name/Time of reminder/Where/When). Alongside this form, Marsha could set up basic preferences stating how much time she needed to get ready, eat, or do any necessary duties before accomplishing the reminder. After filling out the form and submitting, all of her data was sent and safely stored on Remind O’ Clocks database. Without even knowing it, Remind O’ Clock was calculating the true alarm time Marsha needed for her! By calculating the distance of the location for the reminder and preferences set, the backend was subtracting from the time she provided in the original form so all activities needed before leaving/executing the reminder could be done. To get the alarm to sound in her home system rather than the web, Marsha downloaded an app available from the developers of this application and set it up quite simply. After downloading the app and entering her credentials she previously made, the app would make GET request to the web service and retrieve all of her needed reminders. When the reminder time is reached, the qemu_86 emulator built in the app will sound an alert and display the reminder on her device! Now Marsha is happy she has such an easy way to keep up with her busy life.
(Difficulties: Not all options are yet functional. One of three use cases are currently up. In addition, there are issues physically sounding the alarm through the Zephyr app, although the GET request and display are working perfectly in it. GitHub issues were created with more details here: [RemindO’Clock Issues](https://github.com/segFaultCity/ZephyrGroup3/issues))

