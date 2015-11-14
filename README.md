# INSTALLATION
1. Create a configuration file config.ini based on config-ini-template.
* Change base_url parameter by following structure: if you url to the project is http://yoursite.com/, then set just 'yoursite.com/'.
* Set up host, username and password to connect to your DataBase.
* Set questionsCount to the range from 1 till 135 to set up count of questions for Online Test.

2. Create DataBase.
* Make sure you have sql folder where should be the following files:
** source_it_project_structure.sql          - structure of the DataBase.
** source_it_project_sample_data.sql        - sample data.
** source_it_project_onlinetest_data.sql    - questions and answers for the online test.
* Execute then in the following order: structure, data and then data for the online test.

3. Follow to the project in your browser. Make sure that everything works fine.