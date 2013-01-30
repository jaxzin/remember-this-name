# Developing Locally
1. Use [MAMP](http://codex.wordpress.org/Installing_WordPress_Locally_on_Your_Mac_With_MAMP)
  1. Set the preference so the Apache root is your clone of this git repo.
1. Edit MAMP/Library/bin/envvars to add:
  1. DATABASE_URL=mysql://root:root@localhost/DATABASE
  1. export DATABASE_URL

# Deploying to Heroku
TBD