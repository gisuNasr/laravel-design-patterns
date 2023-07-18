# About repository design pattern

this pattern allows you to use objects without having to know how these objects are persisted. In another words it's an abstraction of the data layer.
A repository can be described as a layer of abstraction between the domain and data mapping layers, one that provides an avenue of mediation between both, via a collection-like interface for accessing domain objects.
This means that your business logic doesn’t need to know how data is retrieved or what the source of the data is. The business logic relies on the repository to retrieve the correct data.

### after serving this project try these routes
- method:Get / index - http://127.0.0.1:8000/api/user
- method:Get / showById - http://127.0.0.1:8000/api/user/1
- method:POST / create - http://127.0.0.1:8000/api/user
- method:Put / updateById - http://127.0.0.1:8000/api/user/1
- method:Delete / destroyById - http://127.0.0.1:8000/api/user/1
