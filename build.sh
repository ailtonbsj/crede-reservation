#!/bin/bash

#jquery
mkdir web/crede-reservation/lib/jquery/ -p
cp node_modules/jquery/dist/*.min* web/crede-reservation/lib/jquery/

#bootstrap
mkdir web/crede-reservation/lib/bootstrap/css/ -p
mkdir web/crede-reservation/lib/bootstrap/fonts/ -p
mkdir web/crede-reservation/lib/bootstrap/js/ -p
cp node_modules/bootstrap/dist/css/*.min* web/crede-reservation/lib/bootstrap/css/
cp node_modules/bootstrap/dist/fonts/* web/crede-reservation/lib/bootstrap/fonts/
cp node_modules/bootstrap/dist/js/*.min* web/crede-reservation/lib/bootstrap/js/

#font-awesome
mkdir web/crede-reservation/lib/font-awesome/css/ -p
mkdir web/crede-reservation/lib/font-awesome/fonts/ -p
cp node_modules/font-awesome/css/*.min* web/crede-reservation/lib/font-awesome/css/
cp node_modules/font-awesome/fonts/* web/crede-reservation/lib/font-awesome/fonts/

#icheck
mkdir web/crede-reservation/lib/icheck/skins/square/ -p
cp node_modules/icheck/skins/square/blue* web/crede-reservation/lib/icheck/skins/square/
cp node_modules/icheck/*.min* web/crede-reservation/lib/icheck/

#toastr
mkdir web/crede-reservation/lib/toastr -p
cp node_modules/toastr/build/*.min* web/crede-reservation/lib/toastr/

#fastclick
mkdir web/crede-reservation/lib/fastclick/ -p
cp node_modules/fastclick/lib/fastclick.js web/crede-reservation/lib/fastclick/

#jquery-slimscroll
mkdir web/crede-reservation/lib/jquery-slimscroll/ -p
cp node_modules/jquery-slimscroll/*.min* web/crede-reservation/lib/jquery-slimscroll/

#imask
mkdir web/crede-reservation/lib/imask/ -p
cp node_modules/imask/dist/imask.min.js web/crede-reservation/lib/imask/

#Moment
mkdir web/crede-reservation/lib/moment/ -p
cp node_modules/moment/locale/pt-br.js web/crede-reservation/lib/moment/
cp node_modules/moment/min/moment.min.js web/crede-reservation/lib/moment/

#eonasdan-bootstrap-datetimepicker
mkdir web/crede-reservation/lib/bootstrap-datetimepicker/css/ -p
mkdir web/crede-reservation/lib/bootstrap-datetimepicker/js/ -p
cp node_modules/eonasdan-bootstrap-datetimepicker/build/css/*min* web/crede-reservation/lib/bootstrap-datetimepicker/css/
cp node_modules/eonasdan-bootstrap-datetimepicker/build/js/*min* web/crede-reservation/lib/bootstrap-datetimepicker/js/

#bootstrap-toggle
mkdir web/crede-reservation/lib/bootstrap-toggle/css/ -p
mkdir web/crede-reservation/lib/bootstrap-toggle/js/ -p
cp node_modules/bootstrap-toggle/css/bootstrap-toggle.min.css web/crede-reservation/lib/bootstrap-toggle/css/
cp node_modules/bootstrap-toggle/js/bootstrap-toggle.min.js web/crede-reservation/lib/bootstrap-toggle/js/

#select2
mkdir web/crede-reservation/lib/select2/css/ -p
mkdir web/crede-reservation/lib/select2/js/i18n/ -p
cp node_modules/select2/dist/css/*min* web/crede-reservation/lib/select2/css/
cp node_modules/select2/dist/js/*min* web/crede-reservation/lib/select2/js/
cp node_modules/select2/dist/js/i18n/pt-BR.js web/crede-reservation/lib/select2/js/i18n/

#Orkidea schedule
mkdir web/crede-reservation/lib/orkidea-schedule/ -p
cp node_modules/orkidea-schedule/schedule.min.js web/crede-reservation/lib/orkidea-schedule/
cp node_modules/orkidea-schedule/schedule.min.css web/crede-reservation/lib/orkidea-schedule/