## API documentation

### Authorization

No Authorization is required. You should test it right on the spot.

## Endpoints
-- -- 
```http
GET /api/courses
```
(No parameters)
### Response

Return the JSON representation of the courses that exist in database.

```javascript
"courses": [
{
  "id": 31,
        "title": "Enim voluptatum pariatur amet numquam et.",
        "description": "Quam consequatur enim suscipit quia. Similique omnis consequatur officiis assumenda quos voluptates suscipit aut. Fugiat velit quasi beatae qui explicabo cupiditate non eum.",
        "status": "pending",
        "premium": false,
        "created_at": "2022-10-06 15:19:18",
        "updated_at": "2022-10-06 15:19:18",
        "deleted_at": null
}
]
```
However, if the table is empty, it will return an empty array.
```javascript
"courses": []
````

-- -- 

```http
POST /api/courses
```
**Body form-data**
| Parameter | Type | Description |
| :--- | :--- | :--- |
| `title` | `string` | **Required**. Max 100 characters |
| `description` | `string` | **Required**. Max 250 characters|
| `status` | `string` | Available values 'pending', 'published' |
| `is_premium` | `boolean` | 1 for true, and 0 for false value |

### Response

Return the JSON representation of the course that was created, along with a message.

```javascript
{
  "status": "Course Created Successfully!",
    "course": {
        "title": "demo title",
        "description": "demo description",
        "status": "published",
        "is_premium": true,
        "updated_at": "2022-10-07T16:40:35.000000Z",
        "created_at": "2022-10-07T16:40:35.000000Z",
        "id": 13
    }
}
```

However, if validation fails, it will return a message with all the details according the failed request. (Status code: 422)

```javascript
"message": "Error in data sending",
    "details": {
        "status": [
            "The selected status is invalid."
        ]
    }
}
````

-- -- 

```http
PUT /api/courses/{id}
```

| Parameter | Type | Description |
| :--- | :--- | :--- |
| `id` | `int` | **Required**. The id of the course that needs update |

**Body urlencoded**

| Parameter | Type | Description |
| :--- | :--- | :--- |
| `title` | `string` | Optional . Max 100 characters |
| `description` | `string` | Optional . Max 250 characters|
| `status` | `string` | Optional . Available values 'pending', 'published' |
| `is_premium` | `boolean` | Optional . 1 for true, and 0 for false value |

### Response

Return the JSON representation of the course that was updated, along with a message.

```javascript
{
  "status": "Course Upadated Successfully!",
    "course": {
        "title": "demo title",
        "description": "demo description",
        "status": "published",
        "is_premium": true,
        "updated_at": "2022-10-07T16:40:35.000000Z",
        "created_at": "2022-10-07T16:40:35.000000Z",
        "id": 13
    }
}
````

However, if validation fails, it will return a message with all the details according the failed request. (Status code: 422)

```javascript
"message": "Error in data sending",
    "details": {
        "status": [
            "The selected status is invalid."
        ]
    }
}
````
-- -- 
```http
GET /api/courses/{id}
```

| Parameter | Type | Description |
| :--- | :--- | :--- |
| `id` | `int` | **Required**. The id of the course that needs to be shown |

### Response

Return the JSON representation of the course.

```javascript
{
    "course": {
        "title": "demo title",
        "description": "demo description",
        "status": "published",
        "is_premium": true,
        "updated_at": "2022-10-07T16:40:35.000000Z",
        "created_at": "2022-10-07T16:40:35.000000Z",
        "id": 13
    }
}
````

However, it will throw an error 404 if the given id doesn't match any course from the table.

-- -- 

```http
DELETE /api/courses/{id}
```

| Parameter | Type | Description |
| :--- | :--- | :--- |
| `id` | `int` | **Required**. The id of the course that needs to be deleted |

### Response

Returns a message of successful operation.

```javascript
{
     "status": "Course Deleted Successfully!"
}
````

However, it will throw an error 404 if the given id doesn't match any course from the table.
-- -- 