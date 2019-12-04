
# Opsgenie webhook 

This guide describes how to integrate your Zabbix 4.4 installation with Opsgenie using the Zabbix webhook feature. This guide will provide instructions on setting up a media type, a user and an action in Zabbix.

## In Opsgenie

1\. From the **Settings** menu, select **Integration list** and push **Add** on Rest API HTTPS over JSON.

![](images/image2019-11-27_9-25-11.png?raw=true)

2\. Copy the **API Key** for your new integration and push **Save Integration** at the bottom of frame.

![](images/image2019-11-27_9-30-21.png?raw=true)

*   You can make finer adjustments later.

## In Zabbix

The configuration consists of a _media type_ in Zabbix, which will invoke webhookto send alerts to Opsgenie through the Opsgenie Rest API. To utilize the media type, we will create a Zabbix user to represent Opsgenie. We will then create an alert action to notify the user via this media type whenever there is a problem detected.

## Create Global Macro

1\. Go to the **Administration** tab.

2\. Under Administration, go to the **General** page and choose the **Macros** from drop-down list.

3\. Add the macro {$ZABBIX.URL} with Zabbix frontend URL (for example http://192.168.7.123:8081)

![](images/image2019-12-2_9-19-56.png?raw=true)

4\. Click the **Update** button to save the global macros.

## Create the Opsgenie media type

1\. Go to the **Administration** tab.

2\. Under Administration, go to the **Media types** page and click the **Import** button.

![](images/image2019-12-2_9-23-40.png?raw=true)

3\. Select Import file [Opsgenie_Media.xml](Opsgenie_Media.xml) and click the **Import** button at the bottom to import the Opsgenie media type.

4\. Change the values of the variables url (https://api.opsgenie.com/v2/alerts or https://api.eu.opsgenie.com/v2/alerts) , web (for example, https://myzabbix.app.opsgenie.com), token

![](images/image2019-12-2_9-45-7.png?raw=true)

## Create the Opsgenie user for alerting

1\. Go to the **Administration** tab.

2\. Under Administration, go to the **Users** page and click the **Create user** button.

![](images/image2019-12-2_9-51-34.png?raw=true)

3\. Fill in the details of this new user, and call it “Opsgenie User”. The default settings for Opsgenie User should suffice as this user will not be logging into Zabbix.

4\. Click the **Select** button next to **Groups**.

![](images/image2019-11-27_10-6-10.png?raw=true)

5\. Click on the **Media** tab and, inside of the **Media** box, click the **Add** button.

![](images/image2019-11-21_10-38-46.png?raw=true)

6\. In the new window that appears, configure the media for the user as follows:

![](images/image2019-12-2_9-53-38.png?version=1&modificationDate=1575269661000&api=v2)

*   For the **Type**, select **Opsgenie** (the new media type that was created).
*   For **Send to**: enter any text, as this value is not used, but is required.
*   Make sure the **Enabled** box is checked.
*   Click the **Add** button when done.

7\. Click the **Add** button at the bottom of the user page to save the user.

8\. Use the Opsgenie User in any Actions of your choice. Text from "Action Operations" will be sent to "Opsgenie Alert" when the problem happens. Text from "Action Recovery Operations" and "Action Update Operations" will be sent to "Opsgenie Alert Notes" when the problem is resolved or updated.

For more information, use the [Zabbix](https://www.zabbix.com/documentation/4.4/manual/config/notifications) and [Opsgenie](https://docs.opsgenie.com/docs/alert-api) documentations.

## Supported Versions

Zabbix 4.4, Opsgenie Alert API.
