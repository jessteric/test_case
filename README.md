# Test #1

## Collection of events
- Queue: Use a message queue (RabbitMQ, Redis) to buffer events before passing them to storage

## Events transmission to storage
- Microservices. For work with another microservices
- Database. Using a database to store events

## Events storage
- Indexes. For quick access to events, this need for perfomance

## Events analytics
- Data analysis with specified libs like php-ai/ml
- Save events in specified tables, example "events"
- Work with SQL-requests which counting specified events


# Test #2 (Practicum)
Test

## Script list:
- generateDbAndTable.php (use to create database and table)
- stats.php (use to display information that is required in a task)
- configData.php (additional script for creating additional configuration values and then calling them)
- insert.php (use to write to a table)


## 1 tables are used:
- cars with fields as in the task
- if desired, it could be divided into additional tables with foreign key for car options

## 1 tables are used:
- library used for parsing data received from the API
- voku\helper\HtmlDomParser

## In order to deploy the project we need the following attributes:
- PHP >=7.4
- MySQL
- Copy to your work folder and and start running in the following sequence generateDbAndTable, insert
- Go to the main page and just check the details

For Front-end part I didnt use any JS-Frameworks

# Task 3
## Store Data:
- For storage I would use Amazon S3 
- Google Cloud Storage

## Automatic creation of previews:
- use specified lib ImageMagick - auto preview in real-time

## Possible caching options:
- Local caching if we have same requests for images
- CDN cache

Regarding the last question, unfortunately I don’t quite understand what strict sorting means.
In this case, I would save additional data for the images, for example, title, description and other data