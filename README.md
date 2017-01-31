#PHP 101
This guide will teach you methods like creating Webpages, interacting with SQL databases and more.

##Setup your environment
* You need some sort of Webserver, I like [XAMPP](https://www.apachefriends.org/de/index.html).
* Download your IDE (Development environment). I use [Atom](https://atom.io/), it is a hackable code editor
* I also encourage you to use [Google Chrome](https://www.google.de/chrome/browser/desktop/index.html?brand=CHBD&gclid=CLue5aGG7dECFY8Q0wodYzMBlg), it is one of the best, if not the best browser available
* Download [MySQL Workbench](https://dev.mysql.com/downloads/workbench/)

##Prepare XAMPP
You may need to execute XAMPP as an Administrator

1. Start XAMPP
* Open the Windows Start menu or just press the windows key on your keyboard
* Search for "XAMPP Control Panel"
* Right click on it
* Select "More"
* Click on "Execute as Administrator"

2. Start all needed services
* Locate the freshly opened "XAMPP Control Panel"
* Start "Apache" and "MySQL"

3. Create the folder for the new Project
* Locate the XAMPP folder, usually under `C:/xampp/htdocs`
* Create a new directory in this folder (The folder name is the name you type in the URL bar, like [http://localhost/proj1](http://localhost/proj1) for your first project)

##Prepare Atom
This step only is needed if you are using Atom!

1. Simply start Atom
2. Open your project folder you created in step 3 of "Prepare XAMPP"
* Once Atom is opened locate the "Open a Project" button, click on it and follow the dialog

##Prepare MySQL
Do you already have a Database you can work with? If not go and create one!

1. Create your Database using [MySQL Workbench](https://dev.mysql.com/downloads/workbench/)
2. Don't forget to save your progress, this tool tends to crash frequently
3. Insert some data if you like
4. Upload your Database to XAMPPs MySQL server by using [forward engineer](https://dev.mysql.com/doc/workbench/en/wb-forward-engineering-sql-scripts.html). Don't forget to check "Generate INSERT Statements for Table" after selecting "Forward Engineer", this will also insert all your data to the Database.

###Hurray, we are all set now!

##Lets code
Above you see different folders these folders are different projects you can take a look at! I tried my best to comment everything.
***
**Do not make a one-to-one copy of the code, and also change the comments!**
***
**Happy coding!**