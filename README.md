# Acue Assignments App
Given a course ID (1258 is a reasonable example), produce an HTML table of the course schedule of assignments, in order of due date. The table should have at least 2 rows (title of the assignment and due date). Please also filter out the “Reflection Survey” assignments.

I've used: https://canvas.instructure.com/doc/api/assignments.html

## Requirements
PHP >7.x

## How to run this project?
Please update the .env variables (if you need to update it) insice conf/.env as example APIKEY

```
php -S 127.0.0.1:8000
```

With your browser navigate to 127.0.0.1:8000

### Notes
I've added a search, so you can also search for others courses IDs.
