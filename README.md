# perception

A Wordpress Plugin which classifies Media Library images by detecting individual objects and faces within images using [Google Cloud Vision API](https://cloud.google.com/vision/).

## Installation
This repository is the source code and won't work on your website, if you are looking for the plugin itself you can download the latest version from [here](https://github.com/amirandalibi/perception/releases/latest).

## Features

Detects broad sets of categories within an image, which range from modes of transportation to animals, popular product logos, popular natural and man-made structures, topical entities like celebrities, or news events.

![Working Demo](https://i.imgur.com/KGVPQRQ.gif)

## Requirements

- [Docker](https://www.docker.com) `> 18.09`

## Local Development

Docker is all you need for local development. With the docker daemon running, build and run the application using:

```sh
make start
```

the above command will build the image for both Wordpress and MySQL and run the containers and install Composer dependencies inside `src` folder.

Your Wordpress instance will be available on `http://localhost:8000`

To see the full list of available commands run `make help`

## Important Notes

Please note that Google Cloud Vision API is a commercial service and while it's free for first 1000 units/month but you will be charged for any request after that. See their pricing [here](https://cloud.google.com/vision/pricing#prices).

To better understand their pricing table, here is the list of the features we use in this plugin:

- Label Detection
- Landmark Detection
- Logo Detection
- Web Detection

#### Set up your project

1. In the Cloud Platform Console, go to the Manage resources page and select or create a new project. [Link](https://console.cloud.google.com/cloud-resource-manager?_ga=2.235186115.-332948699.1509126047&_gac=1.39977494.1509552978.EAIaIQobChMI5dSY1eGd1wIVS7nACh2HWwFvEAAYASAAEgKdJfD_BwE)
2. Enable billing for your project. [Link](https://support.google.com/cloud/answer/6293499#enable-billing)
3. Enable the Cloud Vision API. [Link](https://console.cloud.google.com/flows/enableapi?apiid=vision.googleapis.com&redirect=https://console.cloud.google.com&_ga=2.235186115.-332948699.1509126047&_gac=1.39977494.1509552978.EAIaIQobChMI5dSY1eGd1wIVS7nACh2HWwFvEAAYASAAEgKdJfD_BwE)

#### Authentication

For using this plugin, You need to provide a JSON file which contains your Project ID and Key. By following the steps below you can obtain them.

1. In Cloud Platform Console, navigate to the [Create service account key](https://console.cloud.google.com/apis/credentials/serviceaccountkey) page.
2. From the **Service account** dropdown, select **New service account**.
3. Input a name into the **Service account name** form field.
4. From the **Role** dropdown, select **Project > Owner**.
5. Click the **Create** button. A JSON file that contains your key downloads to your computer.

Keep the **JSON** file on your computer, you will need it during the plugin installation.

## Contributing

Contributions are welcome. Create a pull request to get started.

## Issues

Please report any issues [here](https://github.com/amirandalibi/perception/issues).
