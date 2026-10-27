# Multi-Author Blogging Platform

## Entity Relationship Diagram (ERD)

```

Act as a senior database architect, Laravel backend developer, and professional data visualization designer.

Design a complete, academically presentable, visually polished Entity Relationship Diagram (ERD) for a university software engineering project titled:

Multi-Author Blogging Platform

Technology stack: Laravel 13, MySQL, Laravel Eloquent ORM, Laravel Sanctum API, and React SPA.

1. Project Requirements

The platform allows multiple authors to publish articles. Users can read posts, comment on articles, like posts, follow authors, and browse content by categories and tags.

The system must support:

Multiple authors publishing and managing their own posts.

Article categories and reusable tags.

User comments on posts.

A like system that prevents duplicate likes by the same user on the same post.

A follow system that allows users to follow authors.

Rich-text article content.

Post publication status and publication dates.

Referential integrity and normalized relational database design.

2. Required Database Entities

Design the following tables with appropriate columns, data types, primary keys (PK), foreign keys (FK), unique constraints, nullable fields, and timestamps.

A. users

Use Laravel's existing users table. Do not create a separate authors table.

Include:

id — BIGINT, primary key, auto-increment

name — VARCHAR

email — VARCHAR, unique

email_verified_at — TIMESTAMP, nullable

password — VARCHAR

remember_token — nullable

created_at — TIMESTAMP

updated_at — TIMESTAMP

Users can write posts, comment, like posts, and follow other users.

B. posts

Include:

id — BIGINT, primary key

user_id — BIGINT, foreign key referencing users.id

category_id — BIGINT, foreign key referencing categories.id

title — VARCHAR

slug — VARCHAR, unique

excerpt — TEXT, nullable

body — LONGTEXT, for rich-text article content

status — VARCHAR or ENUM, with draft and published values

published_at — TIMESTAMP, nullable

created_at — TIMESTAMP

updated_at — TIMESTAMP

Each post belongs to exactly one author and one category. An author can publish multiple posts.

C. comments

Include:

id — BIGINT, primary key

user_id — BIGINT, foreign key referencing users.id

post_id — BIGINT, foreign key referencing posts.id

body — TEXT

created_at — TIMESTAMP

updated_at — TIMESTAMP

Each comment belongs to one user and one post. Users and posts can each have multiple comments.

D. categories

Include:

id — BIGINT, primary key

name — VARCHAR, unique

slug — VARCHAR, unique

description — TEXT, nullable

created_at — TIMESTAMP

updated_at — TIMESTAMP

One category can contain multiple posts. Each post belongs to one category.

E. tags

Include:

id — BIGINT, primary key

name — VARCHAR, unique

slug — VARCHAR, unique

created_at — TIMESTAMP

updated_at — TIMESTAMP

Tags can be reused across multiple posts.

F. post_tag

Junction table for the many-to-many relationship between posts and tags.

Include:

post_id — BIGINT, foreign key referencing posts.id

tag_id — BIGINT, foreign key referencing tags.id

Composite primary key: (post_id, tag_id)

Do not add an unnecessary independent id column to this junction table.

G. post_likes

Junction table recording user likes on posts.

Include:

user_id — BIGINT, foreign key referencing users.id

post_id — BIGINT, foreign key referencing posts.id

created_at — TIMESTAMP, nullable if appropriate

Use a composite primary key (user_id, post_id) to prevent duplicate likes by the same user on the same post.

H. user_follows

Self-referencing junction table representing users following other users.

Include:

follower_id — BIGINT, foreign key referencing users.id

followed_id — BIGINT, foreign key referencing users.id

created_at — TIMESTAMP, nullable if appropriate

Use a composite primary key (follower_id, followed_id) to prevent duplicate follow relationships. Explicitly document that a user must not follow themselves.

3. Required Relationships and Cardinalities

Display all relationships using standard crow's-foot ERD notation.

users 1 posts

categories 1 posts

users 1 comments

posts 1 comments

posts M tags, implemented through post_tag

users M posts for likes, implemented through post_likes

users M users for follows, implemented through user_follows

Clearly distinguish the two roles in user_follows:

follower_id → users.id

followed_id → users.id

Show all foreign-key connections accurately. Do not create direct many-to-many relationships without their junction tables.

4. Database Design Rules

Apply First, Second, and Third Normal Forms (1NF, 2NF, and 3NF) where applicable.

Avoid unnecessary duplication and transitive dependencies.

Use consistent snake_case table and column names.

Identify primary keys, foreign keys, unique columns, and composite keys.

Clearly indicate nullable fields.

Avoid introducing unnecessary tables or features not required by the project.

Do not create a separate authors table because authors are represented by users.

Use MySQL-compatible types and Laravel migration conventions.

Include timestamps where appropriate.

Do not include default Laravel infrastructure tables such as sessions, cache, jobs, and password reset tokens in the main application ERD. They may be mentioned separately as framework-managed tables.

5. Visual Design Requirements

Create an elegant, professional, university-level database diagram.

Visual style:

Landscape orientation, preferably 16:9 or a wide A3-style layout.

Clean white or very light background.

Professional navy-blue headings with restrained teal, blue, and violet accents.

Each table displayed as a clearly structured entity box.

Table name in a prominent header.

Columns listed in aligned rows.

PK, FK, UNIQUE, and NULLABLE attributes displayed clearly.

Consistent typography and spacing.

Thin, clean relationship lines with minimal crossings.

Crow's-foot cardinalities displayed correctly.

Junction tables placed between their related entities.

Keep users, posts, comments, categories, tags, likes, and follows visually organized into logical groups.

Include a title, technology subtitle, a small legend, and a short cardinality key.

Ensure all text is readable and no table or relationship is clipped.

Do not use decorative icons that reduce readability. Prioritize technical accuracy, clarity, and professional presentation.

6. Required Output

Produce:

A complete, readable ERD image suitable for a university report or presentation.

An editable source version, preferably Mermaid ER diagram code.

A short table describing each entity's purpose.

A relationship summary listing the cardinalities.

A brief validation checklist confirming that all foreign keys and composite keys are correctly represented.

Before finalizing, verify that every foreign key references an existing primary key, all relationship cardinalities are consistent, and the diagram matches the stated requirements.

The result must be technically accurate, visually excellent, complete, and ready to use as the database design document for the Multi-Author Blogging Platform university project.
```
