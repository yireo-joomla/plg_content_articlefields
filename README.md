# Article Fields Plugin
Article fields plugin written for Webdesigner Magazin Joomla Special 2015/02

## Installation
* Copy all the files in the `source` folder to your Joomla root directory.
* Use the Joomla Extension Manager to discover and install this new extension.

## Create installable package
To create an installable package from this source, follow these steps:
* Copy the files in the `source` folder to a temporary folder called `plg_content_articlefields`
* Move the file `articlefields.xml` to the root of this temporary folder
* Create a ZIP file of the temporary folder

## Styling the quote
The code in this repository also contains an extra plugin parameter to allow you to 
define CSS class used in the blockquote HTML:

    <blockquote class="myblockquote">
    ...

This allows you to add CSS code to your Joomla template similar to this:

    blockquote.article_quote {
        text-align: right;
        float:right;
        font-size: 180%;
        padding: 20px;
        width: 20%;
    }

    blockquote.article_quote cite {
        font-size: 70%;
        font-style: italic;
    }

## Questions?
Any questions can be mailed to jisse@yireo.com.
