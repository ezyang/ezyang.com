#!/bin/sh
for i in *.dot
    do dot -Tpng "$i" -o "$i.png"
done
