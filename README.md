### Do X for Y - The Revival Project

TODO:
  - Add email system (DONE)
  - Add confirm email route (DONE)
  - Add reset password route
  - Add Job Search page (DONE)
  - Add Job view page (DONE)
  - Add propel validation (DONE)
  - Add Profile Page info (ALMOST DONE)
  - Add Page to view other users (DONE)
  - jobs/all route needs to have search working, tags, etc.
  - finish profile by replacing the timeline with posted jobs (DONE)
  - fill job/{id} page with real info

NOTES:
1) To upgrade PHP on digital ocean use [this](https://jakelprice.com/article/how-to-upgrade-from-php-70-to-php-71)

ERRORS:
-------------------------------------------
1) ERROR: SQLSTATE[HY000]: General error: 1364 Field 'display_name' doesn't have a default value
  - Sign into MySQL: mysql -u username -p
  - Enter password
  - Type: SET GLOBAL sql_mode='';
  [here](https://www.digitalocean.com/community/questions/change-mysql-sql-mode)

2) Cannot insert a value for auto-increment primary key
  - put allowPkInsert="true" in desired table
