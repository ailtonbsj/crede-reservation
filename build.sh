#!/bin/bash

#jquery
mkdir crede-reservation/lib/jquery/ -p
cp node_modules/jquery/dist/*.min* crede-reservation/lib/jquery/

#bootstrap
mkdir crede-reservation/lib/bootstrap/css/ -p
mkdir crede-reservation/lib/bootstrap/fonts/ -p
mkdir crede-reservation/lib/bootstrap/js/ -p
cp node_modules/bootstrap/dist/css/*.min* crede-reservation/lib/bootstrap/css/
cp node_modules/bootstrap/dist/fonts/* crede-reservation/lib/bootstrap/fonts/
cp node_modules/bootstrap/dist/js/*.min* crede-reservation/lib/bootstrap/js/

#font-awesome
mkdir crede-reservation/lib/font-awesome/css/ -p
mkdir crede-reservation/lib/font-awesome/fonts/ -p
cp node_modules/font-awesome/css/*.min* crede-reservation/lib/font-awesome/css/
cp node_modules/font-awesome/fonts/* crede-reservation/lib/font-awesome/fonts/

# #ionicons
# mkdir crede-reservation/lib/ionicons/css/ -p
# cp node_modules/ionicons/dist/css/*min* crede-reservation/lib/ionicons/css/

#icheck
mkdir crede-reservation/lib/icheck/skins/square/ -p
cp node_modules/icheck/skins/square/blue* crede-reservation/lib/icheck/skins/square/
cp node_modules/icheck/*.min* crede-reservation/lib/icheck/

#toastr
mkdir crede-reservation/lib/toastr -p
cp node_modules/toastr/build/*.min* crede-reservation/lib/toastr/

#fastclick
mkdir crede-reservation/lib/fastclick/ -p
cp node_modules/fastclick/lib/fastclick.js crede-reservation/lib/fastclick/

#jquery-slimscrol
mkdir crede-reservation/lib/jquery-slimscroll/ -p
cp node_modules/jquery-slimscroll/*.min* crede-reservation/lib/jquery-slimscroll/

#imask
mkdir crede-reservation/lib/imask/ -p
cp node_modules/imask/dist/imask.min.js crede-reservation/lib/imask/

#Moment
mkdir crede-reservation/lib/moment/ -p
cp node_modules/moment/locale/pt-br.js crede-reservation/lib/moment/
cp node_modules/moment/min/moment.min.js crede-reservation/lib/moment/

#bootstrap-datetimepicker
mkdir crede-reservation/lib/bootstrap-datetimepicker/css/ -p
mkdir crede-reservation/lib/bootstrap-datetimepicker/js/ -p
cp node_modules/eonasdan-bootstrap-datetimepicker/build/css/*min* crede-reservation/lib/bootstrap-datetimepicker/css/
cp node_modules/eonasdan-bootstrap-datetimepicker/build/js/*min* crede-reservation/lib/bootstrap-datetimepicker/js/

#bootstrap-toggle
mkdir crede-reservation/lib/bootstrap-toggle/css/ -p
mkdir crede-reservation/lib/bootstrap-toggle/js/ -p
cp node_modules/bootstrap-toggle/css/bootstrap-toggle.min.css crede-reservation/lib/bootstrap-toggle/css/
cp node_modules/bootstrap-toggle/js/bootstrap-toggle.min.js crede-reservation/lib/bootstrap-toggle/js/

#select2
mkdir crede-reservation/lib/select2/css/ -p
mkdir crede-reservation/lib/select2/js/i18n/ -p
cp node_modules/select2/dist/css/*min* crede-reservation/lib/select2/css/
cp node_modules/select2/dist/js/*min* crede-reservation/lib/select2/js/
cp node_modules/select2/dist/js/i18n/pt-BR.js crede-reservation/lib/select2/js/i18n/

#Orkidea schedule
mkdir crede-reservation/lib/orkidea-schedule/ -p
cp node_modules/orkidea-schedule/schedule.min.js crede-reservation/lib/orkidea-schedule/
cp node_modules/orkidea-schedule/schedule.min.css crede-reservation/lib/orkidea-schedule/