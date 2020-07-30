# Build and run the container
make build
# Wait for ontainer to become available
echo "$(tput setaf 15)$(tput setab 33)Waiting for Wordpress to become available...$(tput sgr 0)"
while ! curl -sSI -o /dev/null http://localhost:8000/; do sleep 3; done;
# Install composer dependencies inside the volume
echo "Installing Composer dependecies..."
make install
