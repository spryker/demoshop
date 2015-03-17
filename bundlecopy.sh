#!/bin/bash

destination=$2

while read line
do
    path=${line}
    mkdir -p "$2/$path"
    cp -R "$path/" "$2/$path/"
done < $1