call cd C:/xampp/htdocs/pds/tensorflow-yolov4-tflite/env/Scripts 
call activate.bat && cd C:/xampp/htdocs/pds/tensorflow-yolov4-tflite 
call echo %1
call python detect.py --images ../manual_reported_images/%1 --score 0.6 --output ../manual_reported_images
call exit
::call cd C:/xampp/htdocs/pds
::echo Successful