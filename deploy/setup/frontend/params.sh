#!/bin/bash

# provide antelope legacy
FE_ANTELOPE_LEGACY=false

# package manager (npm|yarn)
FE_PACKAGE_MANAGER='npm'

# install command (add flags/args here if you need)
FE_INSTALL_COMMAND='install'

# yves
FE_YVES_SCRIPT='yves' 
FE_YVES_BUNDLE_PKGJSON_PATTERN=".+/assets/Yves/package.json$"

# zed
FE_ZED_SCRIPT='zed'
FE_ZED_BUNDLE_PKGJSON_PATTERN=".+/assets/Zed/package.json$"

