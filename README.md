the customer facing website

# Pre Requisites

- Vagrant
- Ansible

# Intro

This is modelled after the awesome [trellis](https://www.roots.io/trellis/) and [bedrock](https://roots.io/bedrock/)

To get started, just make sure vagrant is working. then simply do

```
vagrant up
```

vagrant will bring up a ubuntu based virtual machine and ansible will automatically configure it for you.

After the provisioning is done. go to

```
http://www.intentaware.dev/
```

and you will see the current intentaware website. Magic right? We are not done yet, because to understand the magic, you need to look under the hood.

# Project Structure

### trellis directory

it basically contains ansible playbooks. everything is configured and production ready

### site directory

it is basically the wordpress folder customized and good to go.

### theme directory

it is basically the theme directory for wordpress

# Understanding bedrock the old way

The ```site/web/app/``` folder is basically the ```wp-content``` folder. if you want to install plugins, just put it in here.

# Releasing

If your public key is properly accepted at server just do

```bash
./publish.sh
```

and all your new code will be made available on the server. magic!

### One more thing

happy coding.
