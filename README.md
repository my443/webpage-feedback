# webpage-feedback
A quick and easy way to gather user feedback from any single web-page.
It takes the Yes/No feedback from a user and records the page that the user was visiting, the time of the feedback, as well as their feedback.

* To run this quickly use `php -S localhost:8021`. This will serve a sample on [localhost:8021](localhost:8021)
* To deal with concurrency, each response gets a separate file. You will have to consolidate all of those files into a database to get good data. 
    * Each filename is a unique filename with a date-stamp and a GUID. 

## Images
![](/images/webpage-feedback-1.png)
![](/images/webpage-feedback-2.png)
