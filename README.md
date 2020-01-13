## Laravel Book List Example Project

### Jacob Grace

Welcome to my book list example project!
This is a Laravel project with both a web interface and a publicly available API.

You can sort the book list table by clicking any of the column headers.

The table also supports click and drag sorting.

#### Postman Collection
Here is the Postman collection to my [API](https://www.getpostman.com/collections/df189c5cd023c2848b6a)

##### Library used for drag and drop sorting
https://github.com/SortableJS/Sortable

##### Side note
I'm not entirely satisfied by the way drag and drop sorting works along side the paginator table. Currently, if you sort the table by a table column like Author and then drag and drop an item it will reorder the entire list based on that.. but I wanted to use a paginator to prevent the page from being 100s of entries long.