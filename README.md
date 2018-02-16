### Do X for Y - The Revival Project

TODO:
  - Add email system (DONE)
  - Add confirm email route (DONE)
  - Add reset password route
  - Add Job Search page
  - Add Job view page
  - Add propel validation (DONE)
  - Add Profile Page info
  - Add Page to view other users
  - That's it for now
  - jobs/all route needs to have search working, tags, etc.
  - finish profile by replacing the timeline with posted jobs
  - fill job/{id} page with real info

NOTES:
1) To upgrade PHP on digital ocean use [this](https://jakelprice.com/article/how-to-upgrade-from-php-70-to-php-71)

ERRORS:
-------------------------------------------
1) ERROR: SQLSTATE[HY000]: General error: 1364 Field 'display_name' doesn't have a default value
  - SOLUTION: SET GLOBAL sql_mode=''

2) Cannot insert a value for auto-increment primary key
  - SOLUTION: put allowPkInsert="true" in desired table
