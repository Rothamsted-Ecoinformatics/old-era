Template for web site

This template is for a web site designed using PHP and MySQL

It enables to separate content, structure and style...

To keep things organised and not mix up content and structure several choices have been made. 

At the root directory, only structural php files are located... 

index.html: only contains a redirection tag  ---> change the URL to the URL of the PHP file at the root of your directory.

index.php : home page of the site and the one only called... all the other pages will be variation of that one in the form of: 
       index.php?area=area2&page=anypage&othervariable=othervalue
       
A page will always have a area variable (if none, home is area=home is chosen)
a page will always have a page variable (default is page=index)

//info.php is a page accessed by users not logged in Camel
//register.php is the form for registration

includes directory contains all the files needed for the style, functions, ... no content

files are: (extensio can be either php or inc... 
Calendar1-82.js : javascript calendar that can be used 
connect.php: connection to database (put your own connection files in here)
footer.php: footer of the site (you can change anything is it)(footer is not compulsory... you do not have to inlude it)
header.php: header file. The one offered here has tabs. You can make it your own. If you want to update the style of the page, you only have to change one file.
html_functions.php: put here any functions that you will use on more that one page. (the one in there is a mathematical funtion for calculation of probits..)
pagesettings.php: this is where tabs are described, and also where areas and pages titles are assigned to area (folder) and page (file) variables..
when adding a page add a line like  --  filename => "Page Title", --
user.php: that is where a user profile is looked for, and where the decision of the user logged or not is made..
 styles.css: style sheet: some styles are demonstrateed in the Styles page (home area)
you can add styles, change the existing ones and see what happens in the web site.

have a look. only change where comments are made that it can be changed.

other folders are for content
Home folder: default folder for home page and any page in home area.
area2: example of area folder

any content folder has a content.php file and a index.php file 

content.lst
this is the table of content of the area (sits on the Left Hand side)
Add you links to the area pages here... as shown in the content.php file of home area

index.php file could be the only one in the area 
default page of the area. 

when adding a new page (newpage.php) in area2 add a new line like : 
<a href="index.php?area=area2&page=newpage">Title</a><br>  in the content.lst file of that area

add a line in the pagesettings.php file in the array like: 

        newpage => "Page Title",


Hope that helps./ 

Let me know if something breaks down
