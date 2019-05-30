# Security Policy

1. [Supported Versions](#versions)
2. [Reporting security problems to Phooto](#reporting)
3. [Security Point of Contact](#contact)
4. [Incident Response Process](#process)
5. [Vulnerability Management Plans](#vulnerability-management)

<a name="reporting"></a>
## Supported Versions

| Version | Supported          |
| ------- | ------------------ |
| 1.x | :white_check_mark: |

<a name="reporting"></a>
## Reporting security problems to Phooto

**DO NOT CREATE AN ISSUE** to report a security problem. Instead, please
send an email to it@phooto.com.br

<a name="contact"></a>
## Security Point of Contact

The security point of contact is Samuel Fontebasso. Samuel responds to security
incident reports as fast as possible, within one business day at the latest.

In case Samuel does not respond within a reasonable time, the secondary point
of contact is [Marcos Abreu](it@phooto.com.br). Marcos is the
only other person with administrative access to the Phooto API Settings.

If neither Samuel nor Marcos responds then please contact support@github.com
who can disable any access for the Phooto API Client until the security incident is resolved.

<a name="process"></a>
## Incident Response Process

In case an incident is discovered or reported, I will follow the following
process to contain, respond and remediate:

### 1. Containment

The first step is to find out the root cause, nature and scope of the incident.

- Is still ongoing? If yes, first priority is to stop it.
- Is the incident outside of my influence? If yes, first priority is to contain it.
- Find out knows about the incident and who is affected.
- Find out what data was potentially exposed.

One way to immediately remove all access for the Phooto API app is to remove the
private key from the Phooto settings on jenkins. The access can be recovered later
by generating a new private key and re-deploy the app.

### 2. Response

After the initial assessment and containment to my best abilities, I will
document all actions taken in a response plan.

I will create a comment in new issue tagged with "security" to inform users about
the incident and what I actions I took to contain it.

### 3. Remediation

Once the incident is confirmed to be resolved, I will summarize the lessons
learned from the incident and create a list of actions I will take to prevent
it from happening again.

<a name="vulnerability-management"></a>
## Vulnerability Management Plans

### Keep permissions to a minimum

The Phooto API App uses the least amount of access to limit the impact of possible
security incidents.

If someone would get access to the Phooto API app, the worst thing they could do is to
read out contents from pull requests, limited to repositories the Phooto got
installed on.
