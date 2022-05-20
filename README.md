# Pothole-Detection

I trained an object detection model to detect a single class object using YOLOv4 developed by https://github.com/AlexeyAB/darknet. The model was made to detect potholes using an anottated training sample, acquired from https://public.roboflow.com/object-detection/pothole. It was used as an image authenticator in the web application developed, to reduce the number of intentional and unintentional misreports. The model was run using Tensorflow, as it was intended initially to be run on embedded devices as the raspberry pi. The code developed by https://github.com/hunglc007/tensorflow-yolov4-tflite was used to convert Yolov4 to Tensorflow, and used detect.py script to run the trained model on uploaded images.  

The web application features a page for reporting manually pothole occuruences which includes uploading the location and image of the pothole, a page to view the reports in a table and map representation, besides the sign-in, sign-up, welcome and feedback pages. 

This is an all report page where users can view the image of each pothole and corresponding information. 
![image](https://user-images.githubusercontent.com/55383421/169559861-8db53e8f-bf53-4540-93df-0f48c6b3004f.png)

A report manually page, where a user can report a pothole through providing its location, adding a comment and uploading its image. When user uploads the image, it's first checked if it contains a pothole, else the report is rejected. 
![image](https://user-images.githubusercontent.com/55383421/169560153-93ae9c9e-f018-49ea-b456-de25863d6f93.png)
 
