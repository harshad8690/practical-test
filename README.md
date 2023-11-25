# Project Setup

1. Run DB script from the DB script folder
2. Make sure you have seed data into weekdays table.(inculded into the script file)
3. Change .env file for the connection

Note: DB can be created using migration command, however data of the weekdays table needs be added using below query:

```
INSERT INTO `week_days` (`id`, `day_name`, `created_at`, `updated_at`) VALUES
(1, 'Monday', NULL, NULL),
(2, 'Tuesday', NULL, NULL),
(3, 'Wednesday', NULL, NULL),
(4, 'Thursday', NULL, NULL),
(5, 'Friday', NULL, NULL),
(6, 'Saturday', NULL, NULL),
(7, 'Sunday', NULL, NULL);
```

## Demo
Demo video is available into the Demo folder here: [Project Demo](https://github.com/harshad8690/practical-test/tree/master/project-demo)

