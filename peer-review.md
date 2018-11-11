## P3 Peer Review

+ Reviewer's name:  Pat Ausman
+ Reviwee's name: Dory Azar
+ URL to Reviewe's P3 Github Repo URL: http://p3.broadposter.com

## 1. Interface
+ I found the content of the home page complete but didnt see the discover button without scrolling down so I was confused how to start it up.
+ Create page - Image to upload the image file. It was not clear to me that i needed to click on the image to upload the file.  
+ Fields on the create page are indicated to be required by a star which was not clear to me.



## 2. Functional testing

+ Test 1: Leave any of the text box results blank - passed
    * Result:  Error messages as needed were displayed

+ Test 2: Do not upload an image. - passed
    * Result: Error message as needed was displayed

+ Test 3: Enter illegal numeric data - passed
    * Negative number - passed
    * Less that 1000 - passed
    * Greater than 50000 - passed
    * Enter alpha characters including $ sign - passed

+ Test 4: Enter different images- failed
    * Result Some passed, some were ignored after selection.  I have included an image that did not work as peer-review-bad-image png
    * Click/uploading pictures multiple times before submit usually lead to picture failure upload message upon submit. Could it be the size of the image? 

+ Test 5: From Discovery click on any of the images. - passed
    * The images and associated data are displayed.

+ Test 6: Test the navigation buttons on any poster: http://p3.broadposter.com/posters/{id}  - failed
    * The Edit button does not do anything. The view code supports this. Intentional?

+ Test 7: Test the social buttons in the footer. - passed
    * All buttons worked as intended.




## 3. Code: Routes
+ Code routes are well done and well commented. No extraneous code. Simple and clear.


## 4. Code: Views
+ Outstanding use of inheritance with multiple dynamic layers.  
+ Logic is not included in any view file


## 5. Code: General
+ The code style was done correctly. 
+ I was particularly impressed with the dynamic navigation bar.
+ I am not sure what the min and max values on the image validation does. Size of the image?


## 6. Misc
I would decrease the image size on creating a new poster perhaps even use a thumbnail. The image overwhelms the page.
Also the unload image is too big and the text font is weirdly spaced.
A great project idea in general!
