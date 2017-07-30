#!/usr/bin/env bash

# see https://github.com/dflydev/git-subsplit
# first time run: git subsplit init git@github.com:deasilworks/4klift.git

git pull origin master
git push origin master
git subsplit update
git subsplit publish "
    src/deasilworks/api:git@github.com:deasilworks/api.git
    src/deasilworks/cef:git@github.com:deasilworks/cef.git
" --heads=master