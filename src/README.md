## CartHook API Summary

**Database**

Simple structure with foreign keys for data consistency.

Indexes for search optimization:

- Users table
    - email: unique index
- Posts table
    - user_id: index
    - title: fulltext index
- Comments table
    - post_id: index

**Code**

- Controllers handling requests and responses
- Use of repositories to improve testability
- Use of events to persist data from the third party api
- Use of JSONPlaceholder as a service to make it replaceable 

## Optimizations & Future tasks to tackle

- Error handling
- Use of a real cache system
- Data validation
- Unit tests
