# lambda-php-8-features
Project that aims to have "dummy" examples of the new PHP8 features.


Currently, PHP8 still is in beta version, but [bref](https://github.com/brefphp/bref) not only allows us to create AWS lambdas with custom PHP layers but also has the most updated PHP8 beta version on those layers.

#### Stack Documentation
https://bref.sh <br />
https://serverless.com/framework/docs/ <br />
http://php-di.org <br />

----
#### Installation

##### Requirements
* [Yarn](https://classic.yarnpkg.com/en/docs/install/) and [composer](https://getcomposer.org/download/) for dependency managers
* [Docker](https://docs.docker.com/get-docker/) for local invocations

##### Dependencies
* For the project itself:
```bash
composer install
```

* For deployment and local invocation (serverless)
```bash
yarn install
```

----
#### Configuration and secrets

##### Configure aws
* In order to deploy and test this lambda, you will need to create an aws account and setup the credentials on serverless.
We recommend you to follow the [official bref documentation](https://bref.sh/docs/installation.html#serverless)

##### Deployment bucket
* So we don't need to put the bucket name on a public git repo, our `serverless.yml` is fetching the repo name from a non-created file named `secrets.yml`.
* You need to create that file an also put a key named `deploymentBucket` and the value being your bucket name.
* This file can also be used for future similar arguments.

----
#### Test Event (aws console)

```bash
{
 "Records": [
   {
     "body": "{\"arg1\":\"Test number\", \"arg2\": 1}"
   }
 ]
}
```

#### Execute locally
* `data` is the content received by the lambda. You can use the previous example
```bash
yarn local -d '{data}' 
```

#### Deploy
* Assuming you already followed the `Configure aws` and we don't to deal with multiple environments, you just need to run:
```bash
yarn deploy
```
