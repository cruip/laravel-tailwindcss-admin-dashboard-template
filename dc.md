## Working with the containers
You will need to use the `./dc` command when interacting with the container.

The most common commands you will need are:

- `./dc`: Check the status of the containers
- `./dc up`: Bring up the containers
- `./dc down`: Stop the containers
- `./dc rs`: Restart the containers
- `./dc composer`: Run composer in the container
- `./dc artisan` or `./dc art` or .`/dc a`: Run the artisan command
- `./dc test`: Run phpunit in a new container
- `./dc t`: Run phpunit in the app container
- `./dc yarn`: Run yarn
- `./dc npm`: Run npm
  For most of the above commands any arguments you enter after the command will be passed to the original command, for example running `./dc artisan migrate` would run `php artisan migrate`.

```
Tip! You can alias ./dc to dc
```
## Rebuilding the image
Whenever you make a change to the `Dockerfile` files, you will have to rebuild the images for the changes to take effect. This can be done with:

- `./dc build`
- `./dc rs`


# issues
 if dc does not work just run the below command
- run `chmod u+x dc` in your terminal
- enjoy using script 
