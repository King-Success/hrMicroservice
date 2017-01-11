# PayRoll

#Some Notes
https://www.lifewire.com/remote-utilities-review-2625157

paygrade (if available otherwise 0) + basic_salary = consolidated_salary
paygrade_allowance (if available otherwise 0) + allowance = consolidated_allowance

basic_salary determined by rank if set is the same as not set. see EmployeeAssignedRank.php for details

If anything is wrong with the maths. two files need to be edited.

/app/Jobs/PayEmployee and /resources/payroll/selection.blade.php

Run Local Instance of C9
node server.js -p 8080 -a : -w ~/dippay