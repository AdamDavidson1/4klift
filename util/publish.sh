#!/bin/sh

git pull origin master
git push origin master
git subsplit update

# see https://github.com/dflydev/git-subsplit

git subsplit publish "
     src/deasilworks/API:git@github.com:deasilworks/api.git
     src/deasilworks/CEF:git@github.com:deasilworks/cef.git
     src/deasilworks/CFG:git@github.com:deasilworks/cfg.git
     src/deasilworks/CMS:git@github.com:deasilworks/cms.git
     core:git@github.com:deasilworks/4klift-core.git
     skeleton-se:git@github.com:deasilworks/4klift-se.git
 " --heads=master