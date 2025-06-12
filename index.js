import express from "express";
import cors from "cors";
import supertokens from "supertokens-node";
import { middleware, errorHandler } from "supertokens-node/framework/express";
import Session from "supertokens-node/recipe/session";

import EmailPassword from "supertokens-node/recipe/emailpassword";
const { getUserByEmail, updateEmailOrPassword, InputFormField  } = EmailPassword;


import { getAllCORSHeaders } from "supertokens-node";


supertokens.init({
    framework: "express",
    supertokens: {
        connectionURI: "http://localhost:3567",
        apiKey: "nKx8Hgs2lI7n7g0kFz9H2z0nxVvR5pNJ58hW8A1zds8=",
    },
    appInfo: {
        appName: "CBN Hub",
        apiDomain: "http://localhost:3001", // ⬅️ Changed to HTTP
        websiteDomain: "http://cbnhub.test", // ⬅️ Changed to HTTP if needed
    },
    recipeList: [
        EmailPassword.init({
            signUpFeature: {
                formFields: [
                    {
                        id: "username",
                        validate: async (value) => {
                            if (value.trim() === "") return "Name is required";
                            return undefined;
                        },
                    },
                ],
            },
        }),
        Session.init({
            cookieSecure: false, // ⬅️ Must be false for HTTP
        }),
        
    ],
});

const app = express();

app.set("trust proxy", 1);

app.use(cors({
    origin: "http://cbnhub.test",
    credentials: true,
    allowedHeaders: ["content-type", ...getAllCORSHeaders()],
}));

app.use(express.json());

app.use(express.urlencoded({ extended: true }));
app.use(middleware());

app.get("/test-supertokens-connection", async (req, res) => {
    try {
        const response = await fetch("http://localhost:3567/hello");
        const data = await response.text();
        res.json({ 
            success: true, 
            message: "SuperTokens core is running",
            response: data 
        });
    } catch (error) {
        res.status(500).json({ 
            success: false, 
            message: "SuperTokens core is not accessible",
            error: error.message 
        });
    }
});

app.get("/check-routes", (req, res) => {
    res.send(app._router.stack
        .filter(r => r.route)
        .map(r => r.route.path)
    );
});



app.post("/update-email", async (req, res) => {
  const { userId, newEmail } = req.body;

  if (typeof userId !== "string" || typeof newEmail !== "string") {
    return res.status(400).json({ message: "Invalid input types" });
  }

  try {
    const result = await updateEmailOrPassword({
      userId,
      formFields: [
        new InputFormField("email", newEmail),
      ],
    });

    if (result.status === "OK") {
      return res.json({ message: "Email updated successfully" });
    }

    if (result.status === "EMAIL_ALREADY_EXISTS_ERROR") {
      return res.status(409).json({ message: "Email already exists" });
    }

    return res.status(500).json({ message: "Unexpected error", result });
  } catch (err) {
    console.error("Update failed:", err);
    return res.status(500).json({ message: "Internal server error" });
  }
});


app.use(errorHandler());

// 🔓 HTTP only server
app.listen(3001, () => {
    console.log("SuperTokens backend running at http://localhost:3001");
});