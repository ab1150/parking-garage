The license plate reader relies on an open source software called OpenALPR.
Installation instructions for Ubuntu Linux:
https://github.com/openalpr/openalpr/wiki/Compilation-instructions-%28Ubuntu-Linux%29

In order to run the reader, the configuration files for the OpenALPR daemon first need to be configured.
In the directory where the configuration files are stored for your system, open the alprd.conf file and insert
the following lines of code:

[daemon]

country = us

stream = /location/of/my/video/device <-- Please edit this accordingly

company_id = softE
site_id = myWebcam

store_plates = 0
store_plates_location = ~/Pictures

upload_data = 1
upload_address = http://localhost/parking-garage/platesHandler.php

This will configure the daemon to use the assigned stream device and upload the captured license plates to the
parking-garage directory for processing. The plates.txt file automatically updates as the plates are being read in.
