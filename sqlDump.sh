#! /bin/bash

mysqldump -h "0.0.0.0" -u "root" -p"" "soccer_dat" > export.sql
mysql -h "x3ztd854gaa7on6s.cbetxkdyhwsb.us-east-1.rds.amazonaws.com" -u "udllv8c9u8gom2uq" -p"sg46k7eh9eammrdl" "syx2c1kyb99wclfe" < export.sql

mysqldump -h "0.0.0.0" -u "root" -p"" "soccer_dat" > export.sql
mysql -h "mcldisu5ppkm29wf.cbetxkdyhwsb.us-east-1.rds.amazonaws.com" -u "ol2s3tjzee44tp2j" -p"ojxa41s13245negv" "i7e9ovw6dg3voxz8" < export.sql

# cst336-root db
mysqldump -h "0.0.0.0" -u "root" -p"" "scheduler" > export.sql
mysql -h "bfjrxdpxrza9qllq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com" -u "sf1qzp17uzk5ms6f" -p"p6n7qso52n2og7b7" "lbkixx7usdyvo8hh" < export.sql