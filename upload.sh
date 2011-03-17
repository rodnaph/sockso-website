#!/bin/sh

rsync --exclude-from=exclude.txt -avz * rodnaph@sockso.pu-gh.com:~/apps/smut/sites/sockso.pu-gh.com
