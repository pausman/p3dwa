## P3 Peer Review

+ Reviewer's name:  Pat Ausman
+ Reviwee's name: Chantal Thomas
+ URL to Reviewe's P3 Github Repo URL: *http://p3.dwafall18.me/*

*


## 1. Interface
+ Clean and simple interface
+ The "get started" link on the front page gave me the error "dwa-p3.loc’s server IP address could not be found."
+ It would be nice if any restrictions on the fields were noted on the pages. For example height is restricted to 2 digits. 
+ I would also try to validate more precisely. Height can be 24 feet 99 inches.  


## 2. Functional testing
+ Test 1: Enter no data for age, height and weight:  Works as intended with required error message.
+ Test 2: Enter really big numbers for height or age or weight: Works as intended with required error message.
+ Test 3: Enter zero values for height or age or weight: Does the calculation but it should give an error message.
+ Test 4: Enter negative numbers for height or age or weight:  Works as intended with required error message.
+ Test 5: Enter a url for a page that does not exit.: Beautiful 404 page!!
+ Test 6: Enter symbols or alpha characters in number inputs: Works as inteded with required error message

## 3. Code: Routes
+ Routes are elegantly simple. No extraneous code.



## 4. Code: Views
+ template inheritance is used for css, navigation bat, and error message.
+ Logic is not in views
+ Only blade used
+ Followed the use of blades and templates similar to lecture.

## 5. Code: General
Code is well laid out.
+ There is a function store which is not used. 
+ The calculation process could benefit from some consolidation of some of the code. Example below uses the same formula except for the last value. I would also use a switch statement but it does work as written!
'''     if ($exerciseAmount == 'none') {
                $caloricIntake = ((10 * $this->toKilograms($weight)) + (6.25 * $this->toCentimeters($feet, $inches)) - (5 * $age) - 161) * 1.2;
            } else if ($exerciseAmount == 'slightly') {
                $caloricIntake = ((10 * $this->toKilograms($weight)) + (6.25 * $this->toCentimeters($feet, $inches)) - (5 * $age) - 161) * 1.375;
            } else if ($exerciseAmount == 'moderate') {
                $caloricIntake = ((10 * $this->toKilograms($weight)) + (6.25 * $this->toCentimeters($feet, $inches)) - (5 * $age) - 161) * 1.55;
            } else if ($exerciseAmount == 'active') {
                $caloricIntake = ((10 * $this->toKilograms($weight)) + (6.25 * $this->toCentimeters($feet, $inches)) - (5 * $age) - 161) * 1.725;
            } else if ($exerciseAmount == 'veryActive') {
                $caloricIntake = ((10 * $this->toKilograms($weight)) + (6.25 * $this->toCentimeters($feet, $inches)) - (5 * $age) - 161) * 1.9;
''''


## 6. Misc
+ Interesting project!
