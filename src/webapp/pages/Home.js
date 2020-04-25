import React from "react";

import JustTextContent from "../components/JustTextContext";

export default function HomePage() {
  return <JustTextContent
      header="Welcome to Flatbush United Mutual Aid!"
      body="We're a local mutual aid group, active in Flatbush and surrounding neighborhoods. We aim to build connections and support each other through this crisis in a spirit of solidarity, recognizing that we all have something to offer and we all have something we need."
      followupRoute="https://join.slack.com/t/flatbushunited/shared_invite/zt-dufw2c79-uSu75pEECMSdzrZesI0r2g"
      followupText="Join us on slack!"
  />;
}
