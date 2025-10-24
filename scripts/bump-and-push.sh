#!/bin/bash

# Simple script to bump version and push
# Usage: ./scripts/bump-and-push.sh [patch|minor|major]

VERSION_TYPE=${1:-patch}

echo "🚀 Bumping version ($VERSION_TYPE) and pushing..."

# Run version bump
composer run version:$VERSION_TYPE

echo "✅ Version bumped and pushed successfully!"
echo "📦 New version: $(composer run version:show)"
